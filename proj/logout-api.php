<?php

session_start();

session_destroy(); // 清除所有的 session
// unset($_SESSION['loginUser']); // 移除 'user' 對應的值

// 轉向, redirect
header('Location: index_.php');
