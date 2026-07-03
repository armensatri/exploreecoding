<?php

// AUTH
require __DIR__ . '/auth/login.php';
require __DIR__ . '/auth/logout.php';
require __DIR__ . '/auth/register.php';

// BACKEND
require __DIR__ . '/backend/account.php';
require __DIR__ . '/backend/blocked.php';
require __DIR__ . '/backend/dashboard.php';
require __DIR__ . '/backend/managedata.php';
require __DIR__ . '/backend/managemenu.php';
require __DIR__ . '/backend/manageuser.php';
require __DIR__ . '/backend/programming.php';
require __DIR__ . '/backend/published.php';
require __DIR__ . '/backend/tipscoding.php';
require __DIR__ . '/backend/view.php';

// SUB BACKEND
require __DIR__ . '/backend/subaccess.php';
require __DIR__ . '/backend/subchangepassword.php';
require __DIR__ . '/backend/subprofile.php';
require __DIR__ . '/backend/subvisitor.php';

// FRONTEND
require __DIR__ . '/frontend/home.php';
require __DIR__ . '/frontend/navigation.php';
require __DIR__ . '/frontend/programming.php';
require __DIR__ . '/frontend/support.php';
require __DIR__ . '/frontend/tipscoding.php';
