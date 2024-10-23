<?php

// require '../vendor/autoload.php';

include_once "../includes/functions.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$clientId = $_ENV['CLIENT_ID']; // Replace with your Zoom App Client ID
$clientSecret = $_ENV['CLIENT_SECRET']; // Replace with your Zoom App Client Secret
$accountId = $_ENV['ACCOUNT_ID']; // Replace with your Zoom Account ID (optional)

function getAccessToken($clientId, $clientSecret, $accountId) {
    $url = 'https://zoom.us/oauth/token';

    $data = array(
        'grant_type' => 'account_credentials',
        'account_id' => $accountId,
    );

    $authorization = base64_encode($clientId . ':' . $clientSecret);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: zoom.us',
        'Authorization: Basic ' . $authorization
    ));

    $response = curl_exec($ch);
    $error = curl_error($ch);

    curl_close($ch);

    if ($error) {
        return false;
    } else {
        // Process the response (JSON data containing access token)
        $decodedResponse = json_decode($response, true);
        if (isset($decodedResponse['access_token'])) {
            return $decodedResponse['access_token'];
        } else {
            return false;
        }
    }
}

if (isset($_POST['meeting'])) {
    $accessToken = getAccessToken($clientId, $clientSecret, $accountId);
    if (!$accessToken) {
        die("Could not retrieve Access Token!");
    }

    // Get user selected date and time (assuming they come from a form submission)
    $user_selected_date = $_POST['date'];
    $user_selected_time = $_POST['time'];
    $user_email = $_POST['email'];

    // Convert user selected date and time to Zoom API format (UTC time)
    $user_selected_datetime = new DateTime($user_selected_date . ' ' . $user_selected_time);
    $user_selected_datetime->setTimezone(new DateTimeZone('UTC'));
    $start_time = $user_selected_datetime->format('Y-m-d\TH:i:s\Z');

    // Set up Zoom API endpoint
    $zoom_api_url = 'https://api.zoom.us/v2/users/me/meetings';

    // Set up Zoom API request body
    $data = array(
        'topic' => 'Scheduled Meeting',
        'type' => 2, // Scheduled meeting
        'start_time' => $start_time,
        'duration' => 40, // Duration in minutes
        'timezone' => 'UTC'
    );

    // Set up HTTP headers
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $accessToken
    );

    // Send request to Zoom API to schedule meeting
    $ch = curl_init($zoom_api_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    curl_close($ch);

    // Decode response
    $response_data = json_decode($response, true);

    // Check if meeting was successfully scheduled
    if (isset($response_data['id'])) {
        // Meeting scheduled successfully
        $meeting_id = $response_data['id'];
        $start_url = $response_data['start_url'];

        // Send email to admin with meeting details
        $subject = 'Zoom Meeting Scheduled';
        $message = "A Zoom meeting has been scheduled for <br><br>Date: {$user_selected_date} at Time: {$user_selected_time}<br> User Email: {$user_email}<br>Meeting ID: {$meeting_id}<br> Meeting Link: {$start_url}";

        $adminMailSent = sendMail($_ENV['MAIL_TO'], $subject, $message);
        $userMailSent = sendMail($user_email, $subject, $message);
        if ($adminMailSent && $userMailSent) {
            echo json_encode(["status" => "success", "message" => $message]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to schedule meeting. Please try again later.']);
        }
    } else {
        // Meeting scheduling failed
        echo json_encode(['status' => 'error', 'message' => 'Failed to schedule meeting. Please try again later.']);
    }
}
