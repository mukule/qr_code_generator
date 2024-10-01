<?php

namespace App\Controllers;

use App\Models\VersionModel;

class VersionController extends BaseController
{
    public function version()
    {
        // Check if the user is logged in and has access level 1
        if (!session()->get('logged_in') || session()->get('access_lvl') != 1) {
            session()->setFlashdata('error', 'You don\'t have permission for this action');
            return redirect()->to('/home');
        }
        
    
        $versionModel = new VersionModel();
        
        // Retrieve the current version
        $currentVersion = $versionModel->find(1); 
        
        if ($currentVersion) {
            // Toggle the version level
            $newLevel = ($currentVersion['level'] == 1) ? 2 : 1;
            $versionModel->update(1, ['level' => $newLevel]);
            
            // Set a success message based on the new level
            if ($newLevel == 1) {
                session()->setFlashdata('success', 'QR Generator set to Pro version.');
            } else {
                session()->setFlashdata('success', 'QR Generator set to Limited version.');
            }
        } else {
            // If the version record doesn't exist, handle it accordingly
            session()->setFlashdata('error', 'Version record not found.');
        }
    
        return redirect()->to('/home'); // Redirect back to home or desired location
    }
    
}
