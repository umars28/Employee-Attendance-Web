# Attendance Web Application

## Description
A web application for tracking employee attendance.

## Requirement & Tech
- ✔️ Laravel >= 11.
- ✔️ PHP >= 8.2
- ✔️ CDN Bootstrap 5.3

## Project Architecture
MVC Pattern: The project follows the Model-View-Controller architecture to separate concerns and improve maintainability. To further enhance organization and scalability, a Service Layer has been introduced. This service layer encapsulates business logic, making it easier to maintain, test, and reuse across different parts of the application, ensuring that controllers remain focused on handling HTTP requests and responses.

## Feature
NOTE : Take a look on seeder to use account for login
Employee (Authorization): 
- Login & Logout (Sanctum Authentication)
- Edit Profile User
- Fill Attendance Each Day
- List Attendance All Time

Admin (Authorization):
- Login & Logout (Sanctum Authentication)
- Edit Profile User
- Create/Edit Employee (All Created Employee Using Their Email For Defaut Password, Can Change by theirself later in edit profile)
- List Attendance All Employee All Time

## Image Flow
![Image Flow](https://github.com/umars28/Employee-Attendance-Web/blob/main/public/Attendance.drawio.png?raw=true)

### Installation Steps

1. **Extract ZIP Files or Clone it From Repository**

   Extract ZIP file or Clone it to a directory of your choice on your computer.

2. **Open the Project in your Text Editor**

    Use a code editor like Visual Studio Code or another code editor.

3. **Install Dependencies**

   Copy and paste the following command into your project's command line

    ```composer install```

4. **Setup Environment**

   In the terminal or VS Code command line, copy the .env.example configuration file to .env using the command, adjust the postgreSql config db and also the localhost url in BASE_URL_API so that errors do not occur due to configuration errors:

   ```cp .env.example .env```

5. **Generate Key**

    Run the following command in your command line:

   ```php artisan key:generate```   

6. **Setup Database**

    Create DB with name ```employee_attendance``` then run the command line ```php artisan migrate:fresh --seed```
   
7. **Run Web App**

   Run web app use command line

   ```php artisan serve```
