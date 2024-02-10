<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Student Information</title>
    <style>
      

        .container {
            width: 100%;
          padding-left: 50px;
          padding-right: 50px;
        }

        #customers {
            border-collapse: collapse;
            width: 100%;
        }

        #customers th, #customers td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        #customers th {
            background-color: #04AA6D;
            color: white;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div>
            <h1>Students Record</h1>
            <div style="text-align: right;">
                <button class="btn btn-primary">
                    <a href="{{url('add-student')}}" style="text-decoration: none; color: white;">Add New</a>
                </button>
            </div>
        </div>    

        <table id="customers">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->mobile }}</td>
                        <td>

     

                      <a href="{{url('verify-password/'.$student->id)}}"  class="btn btn-primary btn-sm">Edit</a>
                        </td>
                        <td>
                            <a href="{{url('verify-delete/'.$student->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




</body>
</html>
