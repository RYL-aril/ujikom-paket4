<?php
/**
 * WEB ROUTES
 * Route orchestration file that includes all route groups
 * 
 * Structure:
 * - Public routes (no auth required)
 * - Member routes (auth required)
 * - Staff/Admin routes (auth + role required)
 * - Auth routes (registration, login, password reset, etc)
 */

use Illuminate\Support\Facades\Route;


require __DIR__ . '/public.php';

require __DIR__ . '/anggota.php';
require __DIR__ . '/auth.php';


require __DIR__ . '/petugas.php';
