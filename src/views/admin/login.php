<?php
session_start();
if (isset($_SESSION["role"])) {
    unset($_SESSION["role"]);
}
$_SESSION["role"] = "admin";
require_once __DIR__ . '\\..\\..\\bootstrap.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Template</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Style for overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.25);
            /* Quarter black */
            z-index: 9999;
            display: none;
            /* Initially hidden */
        }

        /* Hide login UI by default */
        #loginUI {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10000;
            /* Higher z-index than overlay */
            display: none;
            /* Initially hidden */

            width: 80%;
            /* Adjust the width as needed */
            height: 80%;
            max-width: 600px;
            /* Optional: Set maximum width for larger screens */
            margin: 0 auto;
            /* Center the element horizontally */

            background-color: #fff;
            /* Background color */
            border-radius: 8px;
            /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Optional: Add shadow */

        }

        #otpUI {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10000;
            /* Higher z-index than overlay */
            display: none;
            /* Initially hidden */

            width: 80%;
            /* Adjust the width as needed */
            height: 80%;
            max-width: 600px;
            /* Optional: Set maximum width for larger screens */
            margin: 0 auto;
            /* Center the element horizontally */

            background-color: #fff;
            /* Background color */
            border-radius: 8px;
            /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Optional: Add shadow */

        }
    </style>
</head>

<body>
    <!-- Button to toggle the UI -->
    <!--button id="toggleButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-4">Toggle UI</!--button-->
    <!-- Overlay -->
    <nav class="fixed top-0 left-0 w-full bg-gray-800/90 backdrop-blur-md p-3 z-50 shadow-md">
        <div class="container mx-auto flex items-center px-6">
            <!-- Logo -->
            <div class="flex items-center">
                <img class="h-8 w-auto" src="./assets/other/logo.png" alt="Logo">
                <span class="text-white ml-3 text-lg font-semibold">CelebSync</span>
            </div>

            <!-- Login Button -->
            <button id="toggleButton" class="ml-auto bg-transparent hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
                Login
            </button>
        </div>
    </nav>


    <div class="relative flex flex-col justify-center h-screen items-center px-6 md:px-12 bg-gradient-to-br from-blue-600 to-purple-700 overflow-hidden">
        <!-- Abstract Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute w-72 h-72 bg-blue-400 opacity-30 rounded-full blur-3xl top-10 left-10 animate-pulse"></div>
            <div class="absolute w-96 h-96 bg-purple-400 opacity-30 rounded-full blur-3xl bottom-10 right-10 animate-pulse"></div>
            <div class="absolute w-48 h-48 bg-white opacity-20 rounded-full blur-2xl top-1/3 left-1/3"></div>
        </div>

        <!-- Main Card Container -->
        <div class="relative flex flex-col md:flex-row items-center w-full max-w-5xl mx-auto bg-white/20 backdrop-blur-lg shadow-lg rounded-2xl p-8 md:p-12 space-y-8 md:space-y-0 md:space-x-12 border border-white/30">
            <!-- Text Content -->
            <div class="text-center md:text-left flex-1">
                <h4 class="text-5xl font-extrabold text-white leading-tight drop-shadow-lg">CelebSync</h4>
                <p class="mt-4 text-lg text-gray-200 drop-shadow">
                    A web-based application designed to assist managers in managing the careers
                    and schedules of artists efficiently.
                </p>
                <div class="mt-6 flex justify-center md:justify-start space-x-4">
                    <button id="toggleButton2" class="bg-white/20 text-white px-6 py-3 rounded-lg font-semibold shadow-md backdrop-blur-sm border border-white/30 hover:bg-white/30 transition">
                        Get Started
                    </button>
                    <button class="bg-white/10 text-gray-200 px-6 py-3 rounded-lg font-semibold shadow-md backdrop-blur-sm border border-white/20 hover:bg-white/20 transition">
                        Learn More
                    </button>
                </div>
            </div>

            <!-- Image -->
            <div class="flex justify-center flex-1">
                <img src="./assets/other/v.png" alt="Your Image"
                    class="w-48 h-48 md:w-64 md:h-64 object-contain rounded-lg shadow-xl transition-transform duration-300 hover:scale-[1.02]">
            </div>
        </div>
    </div>


    <div id="overlay" class="overlay"></div>
    <div id="loginUI" class="flex justify-center items-center min-h-[40vh] mx-auto max-w-md">
        <button onclick="emptyField()" id="backButton" style="position: absolute; top: 10px; left: 10px;" class="border border-gray-300 rounded-lg px-2">X</button>
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-20 w-auto" src="./assets/other/logo.png" alt="Your Company">
                <h2 class="mt-1 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="#" method="POST">
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="text-sm">
                                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>

                    </div>
                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                    </div>
                </form>
                <p class="mt-10 text-center text-sm text-gray-500"></p>
            </div>
            <!--button id="backButton" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Back to Login Page</!--button-->
        </div>
    </div>
    </div>
    <div id="otpUI" class="flex justify-center items-center min-h-[40vh] mx-auto max-w-md" style="display: none;">
        <div class="container mx-auto max-w-md" style="padding-top: 30%;">
            <div class="max-w-sm mx-auto md:max-w-lg">
                <div class="w-full">
                    <div class="bg-white h-64 py-3 rounded text-center">
                        <h1 class="text-2xl font-bold">OTP Verification</h1>
                        <div class="flex flex-col mt-4">
                            <span>Enter the OTP you received at</span>
                            <span id="email-otp" class="font-bold">+91 ******876</span>
                        </div>
                        <div id="otp" class="flex flex-row justify-center text-center px-2 mt-5">
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text" name="" id="first" maxlength="1" />
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text" name="" id="second" maxlength="1" />
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text" name="" id="third" maxlength="1" />
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text" name="" id="fourth" maxlength="1" />
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text" name="" id="fifth" maxlength="1" />
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text" name="" id="sixth" maxlength="1" />
                        </div>
                        <div class="flex justify-center text-center mt-5">
                            <a id="resend-otp" class="flex items-center text-blue-700 hover:text-blue-900 cursor-pointer"><span class="font-bold">Resend OTP</span><i class='bx bx-caret-right ml-1'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Your JavaScript code -->
    <script>
        // Function to toggle the visibility of the overlay and login UI
        function toggleUI() {
            $('#overlay').fadeToggle();
            $('#loginUI').fadeToggle();
        }

        function toggleOTP() {
            $('#loginUI').fadeToggle();
            $('#otpUI').fadeToggle();
            $('#first').focus();
            getEmailFromServer();
        }
        $('#backButton').click(function() {
            toggleUI(); // Hide login UI and overlay
        });
        // Add click event listener to the toggle button
        $('#toggleButton').click(function() {
            toggleUI();
        });
        $('#toggleButton2').click(function() {
            toggleUI();
        });
        $('#verification').click(function() {
            toggleOTP();
        });

        function emptyField() {
            const emailInput = document.getElementById('email');
            emailInput.value = ''; // Set the value to empty

            const passwordInput = document.getElementById('password');
            passwordInput.value = ''; // Set the value to empty
        }

        function censorEmail(email) {
            // Split the email address into local part and domain part
            var parts = email.split('@');
            var localPart = parts[0];
            var domainPart = parts[1];

            // Get the length of the local part
            var localPartLength = localPart.length;

            // Censor all characters except the first and last two characters of the local part
            var censoredLocalPart = localPart.charAt(0) + '*'.repeat(localPartLength - 3) + localPart.slice(-2);

            // Return the censored email address
            return censoredLocalPart + '@' + domainPart;
        }

        function getEmailFromServer() {
            $.ajax({
                url: '../src/controllers/getDataEmail.php', // URL to send the GET request to
                type: 'GET',
                success: function(response) {
                    document.getElementById('email-otp').textContent = censorEmail(response.email);
                    // Process the response data received from the server
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
        // AJAX form submission
        $('form').on('submit', function(e) {
            e.preventDefault(); // Prevent the form from submitting normally
            var formData = $(this).serializeArray();
            formData.push({
                "type": "admin"
            });
            $.ajax({
                url: '../src/controllers/loginController.php', // The URL to send the data to (same as the form's action attribute)
                type: 'POST', // The HTTP method to use for the request
                data: JSON.stringify(formData), // Serialize the form data for the AJAX request
                dataType: 'json',
                contentType: 'application/json', // ini beda dari datatype, datatype utk nerima, ini untuk ngirim
                success: function(response, textStatus, jqXHR) {
                    if (response.two_step == "1") {
                        // If 2-step authentication is enabled, show the OTP UI
                        toggleOTP();
                    } else {
                        // If 2-step authentication is not enabled, redirect to the home page
                        //toggleOTP();
                        document.cookie = "token=" + response.token + ";expires=" + new Date(new Date().getTime() + 86400 * 1000).toUTCString() + ";path=/";
                        window.location.href = '\\..\\src\\views\\admin\\home.php';
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Tangani respons error
                    //var errorMessage = jqXHR.status + ': ' + jqXHR.statusText;
                    //console.error('Error:', errorMessage);

                    // Jika ingin menampilkan pesan kesalahan yang dikirim oleh server (jika ada)

                    if (jqXHR.responseText) {
                        console.error(jqXHR.responseText);
                    }
                    var errorMessage = JSON.parse(jqXHR.responseText);
                    if (jqXHR.status == 400) {
                        // Create the error message element
                        var errorMessageCss = $('<div id="errMessage" class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative" role="alert">' +
                            '<span class="block sm:inline">' + errorMessage.message + '</span>' +
                            '</div>');

                        // Append the error message element to the form
                        if (!$('#errMessage').is(':Visible')) {
                            $('form').prepend(errorMessageCss);
                            // Hide the error message after a delay (e.g., 5 seconds)
                            setTimeout(function() {
                                $('#errMessage').fadeOut('slow', function() {
                                    $('#errMessage').remove();
                                    errorMessageCss = null;
                                });
                            }, 4000); // 5000 milliseconds = 5 seconds
                        }
                    }
                }
            });
        });
        // Function to handle OTP verification
        // Function to handle OTP verification
        function verifyOTP(otp) {
            // Send entered OTP to the server for verification
            console.log(otp);
            $.ajax({
                url: '../src/controllers/otpController.php', // URL to verify OTP on the server side (same as the current script)
                type: 'POST',
                data: JSON.stringify({
                    otp: otp
                }), // Send the OTP to the server
                //dataType: 'json',
                contentType: 'application/json',
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        // OTP verification successful, perform desired actions
                        // For example, redirect the user to a dashboard page
                        document.cookie = "token=" + response.token + ";expires=" + new Date(new Date().getTime() + 86400 * 1000).toUTCString() + ";path=/";
                        window.location.href = '\\..\\src\\views\\admin\\home.php';
                    } else {
                        // OTP verification failed, display error message
                        alert('Incorrect OTP. Please try again.');
                        // Clear the entered OTP
                        $('#first, #second, #third, #fourth, #fifth, #sixth').val('');
                        $('#first').focus();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //console.error('Error:', errorThrown);
                    if (jqXHR.responseText) {
                        console.error(jqXHR.responseText);
                    }
                    // Display error message to the user
                    alert(JSON.parse(jqXHR.responseText).message);
                    // Tangani respons error
                    var errorMessage = jqXHR.status + ': ' + jqXHR.statusText;
                    console.error('Error:', errorMessage);

                    // Jika ingin menampilkan pesan kesalahan yang dikirim oleh server (jika ada)
                    if (jqXHR.responseText) {
                        console.error('Server Error:', jqXHR.responseText);
                    }
                }
            });
        }

        function resendOTP() {
            // Send entered OTP to the server for verification
            $.ajax({
                url: '../src/controllers/resendOtpController.php', // URL to verify OTP on the server side (same as the current script)
                type: 'GET', // Send the OTP to the server
                success: function(response) {
                    console.log(response.message);
                    alert("OTP has been resent to your email!");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //console.error('Error:', errorThrown);
                    if (jqXHR.responseText) {
                        console.error(jqXHR.responseText);
                    }
                    // Display error message to the user
                    alert(JSON.parse(jqXHR.responseText).message);
                    // Tangani respons error
                    var errorMessage = jqXHR.status + ': ' + jqXHR.statusText;
                    console.error('Error:', errorMessage);

                    // Jika ingin menampilkan pesan kesalahan yang dikirim oleh server (jika ada)
                    if (jqXHR.responseText) {
                        console.error('Server Error:', jqXHR.responseText);
                    }
                }
            });
        }
        // Event listener for OTP input fields
        $('#first, #second, #third, #fourth, #fifth, #sixth').on('input', function() {
            var otp = $('#first').val() + $('#second').val() + $('#third').val() + $('#fourth').val() + $('#fifth').val() + $('#sixth').val();
            // Check if all OTP input fields are filled
            if (otp.length === 6) {
                // Call verifyOTP function
                verifyOTP(otp);
            }
        });
        $('#first').on('input', function() {
            $('#second').focus();
        })
        $('#second').on('input', function() {
            $('#third').focus();
        })
        $('#third').on('input', function() {
            $('#fourth').focus();
        })
        $('#fourth').on('input', function() {
            $('#fifth').focus();
        })
        $('#fifth').on('input', function() {
            $('#sixth').focus();
        })
        $('#resend-otp').on('click', function() {
            // Perform the action to resend OTP
            // For example, call a function to resend OTP via AJAX
            resendOTP();
        });
    </script>
</body>

</html>