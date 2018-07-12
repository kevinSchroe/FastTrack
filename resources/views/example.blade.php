<!DOCTYPE html>
<html>
<head>
    <title>Example</title>
</head>
<body>
<form method="post" action="/FastTrack/public/example">
    <input type="text" name="hallo" id="hallo" /><br />
    <input type="radio" name="test" value="1" /> 1<br />
    <input type="radio" name="test" value="2" /> 2<br />
    <button type="submit">Submit</button>
    {{ csrf_field() }}
</form>
</body>
</html>