
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
   <style>
    body {


    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f4f4f4;
}

.form-container {
    margin: auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
}

input[type="text"], 
input[type="email"], 
input[type="tel"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

   </style>
</head>
<body>
    <div class="form-container">
        <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
         @csrf
            <h1>Contact Form</h1>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"  required placeholder="Enter your name" >

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email">

            <label for="number">Phone Number:</label>
            <input type="tel" id="number" name="number" required placeholder="Enter your phone number" >

            <label for="file">File uplod</label>
            <input type="file" id="file" name="profile" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

