# Product Requirements: Admin Dashboard

This document outlines the product requirements for the Admin Dashboard of the Event Management System.

## 1. Authentication

- **1.1. Login:** Admins must be able to log in using their email and password through a dedicated login page (`/admin/login`).
- **1.2. Logout:** A logout mechanism must be available to securely terminate the admin session.
- **1.3. Role-Based Access Control (RBAC):** The system must enforce that only users with the 'admin' role can access the admin dashboard and its features.

## 2. Dashboard

- **2.1. Overview:** The main dashboard should provide a high-level overview of the system's activity.
- **2.2. Key Metrics:** Display key metrics such as:
    - Total number of users.
    - Total number of seminars (upcoming, ongoing, finished).
    - Total number of registrations.
    - Revenue from seminar fees.
- **2.3. Recent Activity:** A feed showing recent activities like new registrations, new users, and completed payments.

## 3. User Management

- **3.1. User Listing:** Admins should be able to view a list of all registered users with details like name, email, and registration date.
- **3.2. User Details:** Ability to view a detailed profile for each user, including their registration history.
- **3.3. User Roles:** Admins should be able to assign and modify user roles (e.g., make a user an admin).
- **3.4. User Search & Filter:** Ability to search for users by name or email and filter them by role or status.

## 4. Seminar Management

- **4.1. Seminar Listing:** A comprehensive list of all seminars with their status (draft, published, ongoing, finished).
- **4.2. CRUD Operations:** Full CRUD (Create, Read, Update, Delete) functionality for seminars.
    - **Create:** Add new seminars with details like title, description, date, time, location, price, and associated trainer.
    - **Update:** Edit existing seminar details.
    - **Delete:** Remove seminars from the system.
- **4.3. Seminar Status:** Ability to change the status of a seminar (e.g., from 'draft' to 'published').

## 5. Trainer Management

- **5.1. Trainer Listing:** View a list of all trainers with their contact information and expertise.
- **5.2. CRUD Operations:** Full CRUD functionality for trainers.
    - **Create:** Add new trainers with their bio, photo, and contact details.
    - **Update:** Modify trainer information.
    - **Delete:** Remove trainers from the system.

## 6. Registration & Attendance Management

- **6.1. Registration Listing:** View a list of all registrations for each seminar, including the user's details and payment status.
- **6.2. Manual Registration:** Admins should be able to manually register a user for a seminar.
- **6.3. Attendance Tracking:**
    - View a list of active seminars to manage attendance.
    - See all registered participants for a specific seminar.
    - Mark participants as 'present' or 'absent'.
    - Start a "presentation mode" for a seminar.

## 7. Payment & Transaction Management

- **7.1. Transaction Monitoring:** A view to monitor all payment transactions, including their status (pending, successful, failed).
- **7.2. Payment Details:** View detailed information for each transaction, including the user, seminar, and amount.
- **7.3. Manual Payment Confirmation:** Ability to manually confirm payments if needed.

## 8. Content Management

- **8.1. Email Templates:** A section to manage and customize email templates for various notifications (e.g., registration confirmation, payment success, seminar reminders).
- **8.2. Page Content:** (Optional) A simple CMS to manage the content of static pages like "About Us" or "Contact".

## 9. Communication

- **9.1. Messaging System:** A tool for admins to send messages (e.g., announcements, updates) to all users or specific groups of users (e.g., attendees of a particular seminar).
- **9.2. Message History:** A log of all sent messages.

## 10. Certificate Management

- **10.1. Certificate Generation:** Automatically or manually generate certificates for attendees who have completed a seminar.
- **10.2. Certificate Customization:** An interface to customize certificate templates.
- **10.3. Certificate Issuance:** Issue certificates to individual attendees or in bulk.

## 11. Reporting & Analytics

- **11.1. Seminar Reports:** Generate reports on seminar performance, including registration numbers, attendance rates, and revenue.
- **11.2. User Reports:** Reports on user growth and engagement.
- **11.3. Financial Reports:** Detailed financial reports on revenue, refunds, and outstanding payments.
