<?php
/**
 * Backend Contact / Inquiry Form Handler
 * Cindy Shi - Luxury Real Estate
 * Target: cindy@cindyshi.ca
 */

header('Content-Type: application/json; charset=UTF-8');

// Allow POST requests only
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'status' => 'error',
        'message' => 'Method Not Allowed. Please submit via POST.'
    ]);
    exit;
}

// Destination email as requested
$to_email = 'cindy@cindyshi.ca';

// Collect and sanitize inputs (supports form-data or JSON payload)
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if (stripos($contentType, 'application/json') !== false) {
    $raw_input = file_get_contents('php://input');
    $input_data = json_decode($raw_input, true) ?: [];
} else {
    $input_data = $_POST;
}

// Extract fields
$source_type = filter_var($input_data['source'] ?? 'general_contact', FILTER_DEFAULT);
$name        = filter_var(trim($input_data['name'] ?? ''), FILTER_DEFAULT);
$email       = filter_var(trim($input_data['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$phone       = filter_var(trim($input_data['phone'] ?? ''), FILTER_DEFAULT);
$message     = filter_var(trim($input_data['message'] ?? ''), FILTER_DEFAULT);

// Gamification / Matching fields
$intent       = filter_var(trim($input_data['intent'] ?? ''), FILTER_DEFAULT);
$property_type= filter_var(trim($input_data['property_type'] ?? ''), FILTER_DEFAULT);
$target_region= filter_var(trim($input_data['target_region'] ?? ''), FILTER_DEFAULT);
$budget_range = filter_var(trim($input_data['budget_range'] ?? ''), FILTER_DEFAULT);
$timeframe    = filter_var(trim($input_data['timeframe'] ?? ''), FILTER_DEFAULT);
$features     = filter_var(trim($input_data['features'] ?? ''), FILTER_DEFAULT);
$property_id  = filter_var(trim($input_data['property_id'] ?? ''), FILTER_DEFAULT);

// Validation
$errors = [];
if (empty($name)) {
    $errors[] = 'Full name is required.';
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'A valid email address is required.';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => implode(' ', $errors),
        'errors' => $errors
    ]);
    exit;
}

// Subject line formatting
if ($source_type === 'matchmaker_quiz') {
    $subject = "⭐ [VIP Matchmaker Client Inquiry] {$name} - {$intent} in {$target_region}";
} elseif (!empty($property_id)) {
    $subject = "🏰 [Exclusive Property Inquiry #{$property_id}] from {$name}";
} else {
    $subject = "📩 [Direct Website Inquiry] from {$name} ({$email})";
}

// Build email body
$email_body = "========================================================\n";
$email_body .= " CINDY SHI LUXURY REAL ESTATE - CLIENT INQUIRY\n";
$email_body .= "========================================================\n\n";
$email_body .= "Submission Date: " . date('Y-m-d H:i:s T') . "\n";
$email_body .= "Inquiry Channel: " . ($source_type === 'matchmaker_quiz' ? 'Interactive Property Matchmaker' : 'Direct Contact Form') . "\n\n";

$email_body .= "--- CLIENT INFORMATION ---\n";
$email_body .= "Client Name:  {$name}\n";
$email_body .= "Client Email: {$email}\n";
$email_body .= "Client Phone: " . ($phone ?: 'Not provided') . "\n\n";

if ($source_type === 'matchmaker_quiz' || !empty($intent)) {
    $email_body .= "--- MATCHMAKER PROFILE & PREFERENCES ---\n";
    $email_body .= "Client Goal:        " . ($intent ?: 'Not specified') . "\n";
    $email_body .= "Property Style:     " . ($property_type ?: 'Not specified') . "\n";
    $email_body .= "Target GTA Region:  " . ($target_region ?: 'Not specified') . "\n";
    $email_body .= "Budget Allocation:  " . ($budget_range ?: 'Not specified') . "\n";
    $email_body .= "Expected Timeline:  " . ($timeframe ?: 'Not specified') . "\n";
    if (!empty($features)) {
        $email_body .= "Priority Amenities: {$features}\n";
    }
    $email_body .= "\n";
}

if (!empty($property_id)) {
    $email_body .= "--- REFERENCED PROPERTY ---\n";
    $email_body .= "Listing Reference: {$property_id}\n\n";
}

if (!empty($message)) {
    $email_body .= "--- CLIENT PERSONAL MESSAGE ---\n";
    $email_body .= "{$message}\n\n";
}

$email_body .= "========================================================\n";
$email_body .= "Direct Client Reply-To: {$email}\n";

// Email headers
$headers = [];
$headers[] = "From: Cindy Shi Real Estate <noreply@cindyshi.ca>";
$headers[] = "Reply-To: {$name} <{$email}>";
$headers[] = "X-Mailer: PHP/" . phpversion();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-Type: text/plain; charset=UTF-8";

$headers_str = implode("\r\n", $headers);

// Attempt to send email via standard PHP mail
$mail_sent = @mail($to_email, $subject, $email_body, $headers_str);

// Store lead log in text/json backup file on server so no leads are lost even if local mail server isn't active
$log_entry = [
    'timestamp' => date('c'),
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'source' => $source_type,
    'intent' => $intent,
    'region' => $target_region,
    'budget' => $budget_range,
    'property_type' => $property_type,
    'timeframe' => $timeframe,
    'features' => $features,
    'message' => $message,
    'dispatched_to' => $to_email,
    'mail_success' => $mail_sent
];

$log_file = __DIR__ . '/inquiries_log.json';
$existing_logs = [];
if (file_exists($log_file)) {
    $existing_content = file_get_contents($log_file);
    $existing_logs = json_decode($existing_content, true) ?: [];
}
array_unshift($existing_logs, $log_entry);
@file_put_contents($log_file, json_encode($existing_logs, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

// Return clean, positive response
echo json_encode([
    'status' => 'success',
    'message' => 'Thank you, ' . htmlspecialchars($name) . '. Your inquiry has been routed directly to Cindy Shi at ' . $to_email . '. Cindy will be in touch with you promptly.',
    'mail_sent' => $mail_sent,
    'lead_logged' => true
]);
exit;
