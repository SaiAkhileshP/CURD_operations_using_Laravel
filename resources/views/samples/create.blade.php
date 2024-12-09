<!DOCTYPE html>
<html>

<head>
    <title>Add Sample</title>
    <link rel="stylesheet" href="{{ url('css/create.css') }}">
</head>

<body>
    <div class="container">
        <h1 class="main-heading">Add Profile</h1>
        <form action="{{ route('samples.store') }}" method="POST" enctype="multipart/form-data" class="form"
            id="sampleForm">
            @csrf
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="age" placeholder="Age" required>
            <textarea name="description" placeholder="Description"></textarea>

            <div>
                <input type="checkbox" name="is_active" value="1"> <label>Is Active</label>
            </div>

            <select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <input type="text" name="role" placeholder="Role">

            <input type="file" name="profile_picture">

            <div>
                <label>Preferences:</label>
                <input type="checkbox" name="preferences[]" value="Option1"> Option1
                <input type="checkbox" name="preferences[]" value="Option2"> Option2
            </div>

            <div>
                <label>Status:</label>
                <input type="radio" name="status" value="Active"> Active
                <input type="radio" name="status" value="Inactive"> Inactive
            </div>

            <button type="submit" class="sub-btn">Submit</button>

        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize validation on the form
            $("#sampleForm").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    age: {
                        required: true,
                        age: true,
                        min: 1,
                        max: 100,

                    },
                    // profile_picture: {
                    //     required: false,
                    //     extension: "jpg|jpeg|png|gif",
                    //     filesize: 2 * 1024 * 1024, // 2 MB in bytes
                    // },
                },
                messages: {
                    name: {
                        required: "Name is required.",
                        // minlength: "Name must be at least 3 characters long.",
                    },
                    email: {
                        required: "Email is required.",
                        email: "Please enter a valid email address.",
                    },
                    age: {
                        required: "Age is required",
                        age: "Plese enter a valid Age",
                    },
                    profile_picture: {
                        extension: "Only JPG, JPEG, PNG, or GIF files are allowed.",
                        filesize: "File size must be less than 2 MB.",
                    },
                },

                submitHandler: function(form) {
                    form.submit(); // Submit the form if validation passes
                },

            });
        });
    </script>
</body>

</html>
