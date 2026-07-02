# Student Portal
A web-based Student Management System built with **PHP, MySQL, JavaScript (AJAX), HTML, and CSS**. The application allows administrators to manage student records, search students, view student details, update admission status, and upload student information with image support.

---

## Features
### Student Registration
- Add new students through a user-friendly form.
- Upload student profile images.
- Client-side and server-side validation.
- AJAX-powered form submission without page reload.

### Student Records Management
- View all students in a dashboard.
- Search students by:
  - Name
  - Admission Status
  - Gender
  - JAMB Score

### Student Profile
- View detailed information for each student.
- Display uploaded profile image.
- View personal and academic information.

### Admission Management
- Update student admission status.
- Available statuses:
  - Undecided
  - Admitted
  - Not Admitted

### CSV Import
- Automatically imports sample student records from CSV.
- Data is only imported when the students table is empty.

### Automatic Database Setup
- Creates the database automatically.
- Creates the students table automatically.
- Imports sample records automatically.

---

## Technologies Used
- PHP
- MySQL
- JavaScript (AJAX)
- HTML5
- CSS3

---

## Project Structure

```text
studentportal/
│
├── config/
│   ├── addStudent.php
│   ├── connectionDB.php
│   ├── createDatabase.php
│   ├── searchStudent.php
│   └── updateAdmissionStatus.php
│
├── css/
│   └── style.css
│
├── js/
│   └── mainscript.js
│
├── uploads/
│   └── Student Images
│
├── csv/
│   └── students.csv
│
├── data/
│   └── states-localgovts.json
│
├── index.php
├── form.php
├── dashboard.php
├── viewStudent.php
│
└── README.md
```

---

## Database

### Database Name

```sql
studentportal
```

### Table Name

```sql
students
```

### Table Fields

| Field | Type |
|---------|---------|
| id | INT |
| image | VARCHAR(255) |
| firstname | VARCHAR(100) |
| middlename | VARCHAR(100) |
| lastname | VARCHAR(100) |
| email | VARCHAR(150) |
| date_of_birth | DATE |
| gender | ENUM |
| phone | VARCHAR(20) |
| address | TEXT |
| state_of_origin | VARCHAR(100) |
| local_govt | VARCHAR(100) |
| next_of_kin | VARCHAR(150) |
| jamb_score | INT |
| admission_status | ENUM |
| created_at | TIMESTAMP |

---

## Installation

### Requirements

- PHP 8+
- MySQL / MariaDB
- Apache Server (XAMPP, WAMP, Laragon, etc.)

### Setup

1. Clone the repository:

```bash
git clone https://github.com/yourusername/studentportal.git
```

2. Move the project folder into your web server root:

```text
xampp/htdocs/studentportal
```

3. Start:

- Apache
- MySQL

4. Open your browser:

```text
http://localhost/studentportal
```

5. The application will automatically:

- Create the database.
- Create the students table.
- Import sample CSV data.

No manual database setup is required.

---

## Validation Rules

### Required Fields

- First Name
- Last Name
- Email
- Date of Birth
- Gender
- Phone Number
- State of Origin
- Local Government
- Next of Kin
- JAMB Score

### Phone Number

- Must contain 10–15 digits.

### JAMB Score

- Must be between 0 and 400.

### Email

- Must be a valid email address.

---

## Image Uploads

Student images are stored in:

```text
/uploads
```

Images are automatically renamed before storage to prevent filename conflicts.

---

## Search Filters

The dashboard supports:

- Search by name
- Filter by admission status
- Filter by gender
- Filter by JAMB score

Filters work independently and can be reset at any time.

---

## Future Improvements

- Authentication and Login
- Role-based Access Control
- Student Editing
- Student Deletion
- Pagination
- Export to Excel
- PDF Reports
- Email Notifications
- Student ID Generation
- Dashboard Statistics

---

## Screenshots

Add screenshots of:

- Home Page
- Student Registration Form
- Dashboard
- Student Profile Page

---

## Author

Developed by **VORK Technologies**

Mission: Creating a world of endless opportunities.

---

## License

This project is open source and available under the MIT License.
