<h1>Welcome to Learning_Laravel at My Website</h1>

<?php
// Output the value of APP_ENV using env() function
echo env('APP_ENV');

// Output the value of APP_ENV using config() function
echo config('app.env');

// Check if the environment is production
if (env('APP_ENV') == 'production') {
    echo 'call api live';
} else {
    echo 'call api sandbox';
}
?>
