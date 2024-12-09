<!DOCTYPE html>
<html>

<head>
    <title>Edit Sample</title>
    <link rel="stylesheet" href="{{ url('css/create.css') }}">
</head>

<body>
    <div class="container">
        <h1>Edit Profile</h1>
        <form action="{{ route('samples.update', $sample->id) }}" method="POST" enctype="multipart/form-data"
            class="form" id="sampleForm">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $sample->name }}" required>
            <input type="email" name="email" value="{{ $sample->email }}" required>
            <input type="text" name="age" value="{{ $sample->age }}" placeholder="Age" required>
            <textarea name="description">{{ $sample->description }}</textarea>

            <div>
                <input type="checkbox" name="is_active" value="1" {{ $sample->is_active ? 'checked' : '' }}> Is
                Active
            </div>

            <select name="gender">
                <option value="Male" {{ $sample->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $sample->gender == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ $sample->gender == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            <input type="text" name="role" value="{{ $sample->role }}">
            <input type="file" name="profile_picture">

            <div>
                <label>Preferences:</label>
                <input type="checkbox" name="preferences[]" value="Option1"
                    {{ in_array('Option1', json_decode($sample->preferences, true) ?? []) ? 'checked' : '' }}> Option1
                <input type="checkbox" name="preferences[]" value="Option2"
                    {{ in_array('Option2', json_decode($sample->preferences, true) ?? []) ? 'checked' : '' }}> Option2
            </div>

            <div>
                <label>Status:</label>
                <input type="radio" name="status" value="Active" {{ $sample->status == 'active' ? 'checked' : '' }}>
                Active
                <input type="radio" name="status" value="Inactive"
                    {{ $sample->status == 'inactive' ? 'checked' : '' }}>
                Inactive
            </div>

            <button type="submit" class="upd-btn">Update</button>
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
