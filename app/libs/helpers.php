<?php

use Illuminate\Support\Facades\Storage;

// Image function ~~

function fileUpdate ($databaseFile, $file, $destination ){

    $fileName = '';

    if($file){
        $fileName = fileUpload ($file, $destination);
        fileDelete($databaseFile);
    }elseif (!$file && $destination) {
        $fileName = $databaseFile;
    }

    return  $fileName;
}

function fileUpload ($file, $destination) {

    $fileName = ''; 

    if(!$file){
        return '';
    }

    if(in_array($file->getClientOriginalExtension(), ['php','asp','jsp','py','rb','cs','java','c','cpp','js'] )) {
        $extension = 'bad';
    } else {
        $extension = $file->getClientOriginalExtension();
    }

    $fileName = md5($file->getClientOriginalName() . time()) . "." .  $extension;

    try{

        $fileName = $destination .  $fileName; 
        $fileName = Storage::disk('public')->putFileAs($file, $fileName );

        return $fileName;

    } catch (Exception $e){
        return '';
    }
}

function fileDelete () {
    foreach (func_get_args() as $filePath) {

        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
    }
}


// for payment status 
function paymentStatus($payment_status){
    $status = [
        'pending' => '<span class="bg-info badge">Pending</span>',
        'paid' => '<span class="bg-success badge">Paid</span>'
    ];

    return $status[$payment_status];

}

// admin panel a loop er jonno 
function paymentStatusOption(){
    $status = [
        'pending',
        'paid'
    ];

    return $status;

}

// for Approval status 
function approvalStatus($approve_status){
    $approveStatus = [
        'pending' => '<span class="bg-info badge">Pending</span>' ,
        'cancelled' => '<span class="bg-danger badge">cancelled</span>',
        'approved' => '<span class="bg-success badge">approved</span>'
    ];

    return $approveStatus[$approve_status];

}

// admin panel a loop er jonno
function approvalStatusOption(){  
    $approveStatus = [
        'pending',
        'cancelled',
        'approved'
    ];

    return $approveStatus;

}
