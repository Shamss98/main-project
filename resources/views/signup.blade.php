@include('shorts.nav');
@section('title', 'Sign Up')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
    
    <head>
    
</body>
<form action="{{ route('register.store') }}" method="POST">
    @csrf
    <h1>Sign Up</h1>
    <input type="text" name="name" placeholder="Username" autocomplete="username" required>
    <input type="email" name="email" placeholder="Email" autocomplete="email" required>
    <input type="password" name="password" placeholder="Password" autocomplete="new-password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password" required>
    <button type="submit">Sign Up</button>
</form>

</body>
</html>