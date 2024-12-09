<!DOCTYPE html>
<html>

<head>
    <title>Sample List</title>

    <link rel="stylesheet" href="{{ url('css/index.css') }}">
</head>

<body>

    <div class="container">
        @if (session('success'))
            <script>
                alert({{ session('success') }})
            </script>
        @endif
        <h1 class="main-heading">CURD Operations Application (TASK)</h1>
        <a href="{{ route('samples.create') }}" class="addNew-btn">Add New +</a>

        <ul class="parent">

            @foreach ($samples as $sample)
                <li class="child">
                    <div class="userData">
                        <div>
                            <lable class="name">{{ $sample->name }}</lable>
                            <lable class="age">{{ $sample->age }}</lable>
                            <p>{{ $sample->email }}</p>

                            <div class="online">
                                <p class="status" id="status"
                                    style="background-color:{{ $sample->status == 'active' ? 'green' : 'red' }} "></p>
                                <p> {{ $sample->status }}</p>
                            </div>

                        </div>

                        <img src="{{ url('storage/' . $sample->profile_picture) }}" alt="Profile_Pic" class="img"
                            width="100px" height="100px">
                    </div>

                    <div class="btns">
                        <a href="{{ route('samples.edit', $sample->id) }}" class="edit-btn">Edit</a>
                        <button class="delete-btn" data-id="{{ $sample->id }}" class="delete-btn">Delete</button>
                    </div>
                </li>
            @endforeach
        </ul>
        {{ $samples->links() }}
    </div>







    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Using javascript for deleting record *with reloding* the page⬇️⬇️

        // document.querySelectorAll('.delete-btn').forEach(btn => {
        //     btn.addEventListener('click', function() {
        //         if (confirm('Are you sure you want to delete this record?')) {
        //             const id = this.dataset.id;
        //             fetch(`/samples/${id}`, {
        //                     method: 'DELETE',
        //                     headers: {
        //                         'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //                     }
        //                 }).then(response => response.json())
        //                 .then(data => alert(data.success))
        //                 .then(() => location.reload());
        //         }
        //     });
        // });


        // Using AJAX for deleting record *without reloding* the page⬇️⬇️

        $(document).ready(function() {
            $('.delete-btn').on('click', function() {
                const id = $(this).data('id'); // Get the ID from the button
                const row = $(this).closest('li'); // Identify the row to remove dynamically

                if (confirm('Are you sure you want to delete this record?')) {
                    $.ajax({
                        url: `/samples/${id}`,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token
                        },
                        success: function(response) {
                            // Notify user of success
                            alert(response.success);

                            // Dynamically remove the deleted record from the view
                            row.fadeOut(500, function() {
                                $(this).remove();
                            });
                        },
                        error: function(xhr) {
                            // Handle error
                            alert('An error occurred while deleting the record.');
                            console.error(xhr.responseText);
                        },
                    });
                }
            });
        });
    </script>

</body>

</html>
