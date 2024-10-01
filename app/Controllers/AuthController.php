<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\DepartmentModel;

class AuthController extends BaseController
{
 
    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            $validation = \Config\Services::validation();
            $validation->setRules([
                'username' => 'required',
                'password' => 'required'
            ]);
    
            if (!$validation->withRequest($this->request)->run()) {
                return view('auth/login', ['validation' => $this->validator]);
            }
    
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
    
            $userModel = new UserModel();
    
            $user = $userModel->where('username', $username)
                              ->orWhere('email', $username)
                              ->first();
    
            if ($user) {
                if ($user['active'] != 1) {
                    session()->setFlashdata('error', 'Inactive account.');
                    return redirect()->back()->withInput();
                }
    
                if (password_verify($password, $user['password'])) {
                    session()->set([
                        'user_id' => $user['id'],
                        'username' => $user['username'],
                        'access_lvl' => $user['access_lvl'],
                        'logged_in' => true
                    ]);
    
                    session()->setFlashdata('success', 'Logged in as ' . $user['username']);
    
                    // Redirect to home without checking access level
                    return redirect()->to('/home');
                } else {
                    session()->setFlashdata('error', 'Invalid username or password');
                    return redirect()->back()->withInput();
                }
            } else {
                session()->setFlashdata('error', 'Invalid username or password');
                return redirect()->back()->withInput();
            }
        }
    
        // Load the login view
        return view('auth/login');
    }
    
    public function register()
    {
        $method = $this->request->getMethod();
    
        if ($method === 'POST') {
            $userModel = new UserModel();
    
            // Define validation rules
            $rules = [
                'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
                'email'    => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).+$/]|differs[username]',
                'full_name' => 'required|min_length[3]|max_length[100]',
                'access_lvl' => 'required|integer|in_list[1,2]'
            ];
    
            // Define custom validation messages
            $messages = [
                'username' => [
                    'is_unique' => 'This username is already taken.'
                ],
                'email' => [
                    'is_unique' => 'This email is already registered.'
                ],
                'password' => [
                    'regex_match' => 'Password must include at least one uppercase letter, one lowercase letter, one special character, and be at least 8 characters long.',
                    'differs' => 'Password must not be similar to username.'
                ]
            ];
    
            // Perform validation
            if (!$this->validate($rules, $messages)) {
                return view('auth/register', [
                    'validation' => $this->validator,
                    'data' => $this->request->getPost(),
                    'access_levels' => [
                        1 => 'Admin',
                        2 => 'Staff'
                    ],
                    'title' => 'Register'
                ]);
            }
    
            // Prepare user data for insertion
            $userData = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'full_name' => $this->request->getPost('full_name'),
                'access_lvl' => $this->request->getPost('access_lvl')
            ];
    
            if ($userModel->insert($userData)) {
                session()->setFlashdata('success', 'Successfully added Staff.');
                return redirect()->to('/staffs');
            } else {
                session()->setFlashdata('error', 'Registration failed. Please try again.');
                return redirect()->back()->withInput();
            }
        }
    
        return view('auth/register', [
            'data' => [],
            'access_levels' => [
                1 => 'Admin',
                2 => 'Staff'
            ],
            'title' => 'Register'
        ]);
    }
    
    public function editStaff($id)
    {
        log_message('info', 'Editing staff with ID: ' . $id);
    
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Authentication Required');
        }
    
       
    
        $userModel = new UserModel();
        $user = $userModel->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
    
        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'username' => [
                    'rules' => 'permit_empty|min_length[3]|max_length[20]|is_unique[users.username,id,' . $id . ']',
                    'errors' => [
                        'is_unique' => 'The username is already taken.'
                    ]
                ],
                'email' => [
                    'rules' => 'permit_empty|valid_email|is_unique[users.email,id,' . $id . ']',
                    'errors' => [
                        'is_unique' => 'The email is already registered.'
                    ]
                ],
                'full_name' => 'required|min_length[3]|max_length[100]',
                'access_lvl' => 'required|integer|in_list[1,2]' // Admin or Staff
            ];
    
            if (!$this->validate($rules)) {
                log_message('error', 'Validation Errors for ID ' . $id . ': ' . print_r($this->validator->getErrors(), true));
                return view('auth/edit', [
                    'validation' => $this->validator,
                    'data' => $user,
                    'access_levels' => [
                        1 => 'Admin',
                        2 => 'Staff'
                    ],
                    'title' => 'Edit Staff'
                ]);
            }
    
            $updatedUserData = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'full_name' => $this->request->getPost('full_name'),
                'access_lvl' => $this->request->getPost('access_lvl')
            ];
    
            try {
                if ($userModel->update($id, $updatedUserData)) {
                    log_message('info', 'Successfully updated staff with ID: ' . $id);
                    return redirect()->to('/staffs')->with('success', 'Staff details updated successfully.');
                } else {
                    log_message('error', 'Model Update Errors for ID ' . $id . ': ' . print_r($userModel->errors(), true));
                    $errors = $userModel->errors();
                    return redirect()->back()->with('error', $errors ? implode(', ', $errors) : 'Failed to update staff details. Please try again.');
                }
            } catch (\Exception $e) {
                log_message('error', 'Exception updating staff with ID ' . $id . ': ' . $e->getMessage());
                return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
            }
        }
    
        return view('auth/edit', [
            'data' => $user,
            'access_levels' => [
                1 => 'Admin',
                2 => 'Staff'
            ],
            'title' => 'Edit Staff'
        ]);
    }
    
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }


    public function updateStaffStatus($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Authentication Required');
        }
        
        $userModel = new UserModel();
        
        
        $user = $userModel->find($id);

        if (!$user) {
            
            return redirect()->back()->with('error', 'User not found.');
        }

        
        $newStatus = $user['active'] == 1 ? 0 : 1;

       
        $updateData = ['active' => $newStatus];
        
        $userModel->update($id, $updateData);

        return redirect()->back()->with('success', 'User status updated successfully.');
    }



}
