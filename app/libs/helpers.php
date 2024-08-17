<?php

// for payment status 

function paymentStatus($payment_status){
    $status = [
        'pending' => '<span class="bg-danger badge">Pending</span>' ,
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