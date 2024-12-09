# CRUD Application with Laravel, Frontend Validation, and AJAX  

### 1. Set Up the Laravel Project  
- Clone the Laravel project repository or create a new Laravel project:  
  ```bash
  laravel new project_name
  ```  
- Configure the `.env` file with appropriate database credentials.  
- Install dependencies:  
  ```bash
  composer install
  ```

### 2. Create a Migration  
- Generate a migration file:  
  ```bash
  php artisan make:migration create_sample_table
  ```  
- Define the following fields in the migration file:  
  - **Integer**: `id`, `age`  
  - **String**: `name`, `email`  
  - **Text**: `description`  
  - **Boolean**: `is_active`  
  - **Date and Time**: `created_at`, `updated_at`  
  - **Enum or Set**: `gender`, `role`  
  - **File Upload**: `profile_picture`  
  - **Checkbox**: `preferences`  
  - **Radio Button Options**: `status`  
  - **Foreign Key**: `user_id` referencing another table.

### 3. Run Migrations  
- Execute the migration:  
  ```bash
  php artisan migrate
  ```

### 4. Set Up a Model  
- Create a model for the table:  
  ```bash
  php artisan make:model Sample
  ```  
- Add the `$fillable` property for mass assignment.

### 5. Create a Controller  
- Generate a controller:  
  ```bash
  php artisan make:controller SampleController
  ```  
- Implement CRUD operations:  
  - **Create**: Form to add data and handle submission.  
  - **Read**: List all records with pagination.  
  - **Update**: Edit form and update data.  
  - **Delete**: Remove a record using AJAX.

### 6. Set Up Routes  
- Define routes for CRUD operations in `routes/web.php`.

### 7. Create Views (Frontend)  
- Use Blade templates to build pages for:  
  - Adding new records.  
  - Editing records.  
  - Viewing all records.  
  - Viewing individual record details.

### 8. Add jQuery Validation  
- Include jQuery in the project.  
- Add validation rules for:  
  - Required fields.  
  - Email format.  
  - File size and type.  
  - Custom messages.

### 9. Implement AJAX for Deletion  
- Use jQuery AJAX for record deletion without page reload.  
- Update the view dynamically to reflect changes.  
- Add a confirmation dialog for deletions.

### 10. Handle File Uploads  
- Configure Laravel file storage (e.g., public or S3).  
- Add file upload logic in the controller for the `profile_picture` field.  
- Ensure uploaded files are accessible via URLs.

### 11. Test the Application  
- Verify CRUD functionalities.  
- Validate forms on both backend and frontend.  
- Test AJAX deletion and file uploads.

### 12. Git Workflow and Pull Request Submission  
- Initialize a Git repository:  
  ```bash
  git init
  ```  
- Link the local repository to a remote repository on GitHub or other platforms.  
- Add and commit changes with meaningful messages:  
  ```bash
  git add .
  git commit -m "Initial commit"
  ```  
- Push changes to the remote repository:  
  ```bash
  git push origin main
  ```

---
## Result

# Create a record : 
![image](https://github.com/user-attachments/assets/dfa872dc-88a4-4b38-8886-273c5df26cd3)

# Home page/ Read : 
![image](https://github.com/user-attachments/assets/f8186c4e-a626-415d-802a-b39b84accff2)

# Update a record : 
![image](https://github.com/user-attachments/assets/26d295c1-b2c2-476f-8696-dcb265da85f4)

# Delete a record : 
![image](https://github.com/user-attachments/assets/bfd70174-e0d5-43ec-a513-f47f6d03b9f6)
![image](https://github.com/user-attachments/assets/609c494f-746c-4e6a-ba67-aad790da69f7)






