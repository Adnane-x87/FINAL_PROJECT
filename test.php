<?php
$plain = 'adnane887@gmail.com'; // ← كتب هنا الكلمة لي كتدخلها فالفورم
$hashed = '$2y$10$R7kUcD4Nbqqq8TCr4eyUrOL6zl79d.ymWYeO2p5paOtfBJMPTbBEy'; // ← حط هنا الباسورد المشفر من جدول admin

if (password_verify($plain, $hashed)) {
    echo "✅ Password is valid";
} else {
    echo "❌ Password is invalid";
}
