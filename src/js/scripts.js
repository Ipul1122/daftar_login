// This file contains JavaScript functions for handling form submissions, displaying popover messages, and managing user interactions on the dashboard, including the logout confirmation popover.

document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('registerForm');
    const loginForm = document.getElementById('loginForm');
    const logoutButton = document.getElementById('logoutButton');
    const logoutConfirmPopover = document.getElementById('logoutConfirmPopover');
    const confirmLogoutButton = document.getElementById('confirmLogoutButton');
    const cancelLogoutButton = document.getElementById('cancelLogoutButton');

    if (registerForm) {
        registerForm.addEventListener('submit', function(event) {
            event.preventDefault();
            // Handle registration logic here
            // Use fetch to send data to register.php
        });
    }

    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            // Handle login logic here
            // Use fetch to send data to login.php
        });
    }

    if (logoutButton) {
        logoutButton.addEventListener('click', function() {
            logoutConfirmPopover.style.display = 'block';
        });
    }

    if (confirmLogoutButton) {
        confirmLogoutButton.addEventListener('click', function() {
            // Handle logout logic here
            // Use fetch to send request to logout.php
        });
    }

    if (cancelLogoutButton) {
        cancelLogoutButton.addEventListener('click', function() {
            logoutConfirmPopover.style.display = 'none';
        });
    }

    // Function to show popover messages
    function showPopover(message, isError) {
        const popover = document.createElement('div');
        popover.className = isError ? 'popover error' : 'popover success';
        popover.innerText = message;
        document.body.appendChild(popover);
        setTimeout(() => {
            document.body.removeChild(popover);
        }, 3000);
    }
});