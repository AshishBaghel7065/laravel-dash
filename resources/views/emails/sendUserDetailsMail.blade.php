<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shivaay Dental Clinic</title>
    <style>
        
         .user-details-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
    font-family: Arial, sans-serif;
  }

  .user-details-table th, .user-details-table td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
  }

  .user-details-table th {
    background-color:  #f39c12;
    color: white;
    font-size: 18px;
  }

  .user-details-table td {
    font-size: 16px;
    color: #555;
  }

  .user-details-container {
    margin-top: 30px;
    width: 100%;
    max-width: 600px;
  display: flex;
  align-items: center;
  justify-content: center;

    overflow-x: auto;
  }
   
    </style>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f9;">

    <div style="width: 100%;background-color: #ffffff; padding: 15px;box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
        
        <div style="text-align: center; color: #002533;">
            <h1 style="font-size: 36px;text-transform: uppercase;">Promotion Adda</h1>
            <p style="font-size: 19px;text-transform: uppercase;margin: 0px;">User Details Submitted</p>
        </div>
      
        <div style="font-size: 18px; color: #333; line-height: 1.6;">
            <p>Dear Admin,</p>
            <p>We have a new user who has just registered on our website. Below are the details:</p>
            <div class="user-details-container">
                <table class="user-details-table">
                  <tr>
                    <th colspan="2">User Details</th>
                  </tr>
                  <tr>
                    <td><strong>Name</strong></td>
                    <td>{{ $name }}</td>
                  </tr>
                  <tr>
                    <td><strong>Email</strong></td>
                    <td>{{ $email }}</td>
                  </tr>
                  <tr>
                    <td><strong>Phone</strong></td>
                    <td>{{ $phone }}</td>
                  </tr>
                  <tr>
                    <td><strong>Appointment Date</strong></td>
                    <td>{{ $date_of_appointment }}</td>
                  </tr>
                  <tr>
                    <td><strong>Message</strong></td>
                    <td>{{ $user_message }}</td>
                  </tr>
                </table>
              </div>

        <div style="text-align: center; margin-top: 30px; font-size: 14px; color: #777;">
            <p>If you have any questions, feel free to <a href="mailto:support@shivaaydental.com" style="color: #002533; text-decoration: none;">contact us</a>.</p>
            <p>&copy; 2025 Promotion Adda. All rights reserved. | Developed By <a href="https://promotionadda.org/" style="text-decoration: none;color: #777;">PromotionAdda</a></p>
        </div>

    </div>

</body>
</html>
