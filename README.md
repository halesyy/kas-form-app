# kas-form-app
Web application allowing KAS to further monitor their registration service and serve 
valueable market data to increase the amount of clients and students entering the school.

## JSON Responses
This is the set of JSON responses handles from POST or GET requests (two segments of the API).
They return some wacky stuff at times, so this is a way to describe the behaviour of requests.

### When creating a new Student in the SESSION
Since the web application is meant to be one page I've built it so the same data is served when
refreshed as well as submitted. When sending the form data to the API to process, the return for
having a new Student in SESSION will be:

```json
{
  "fullName": "Jack G. Hales",
  . . .
}
```

This allows us to (when recieving POST data in jQuery/JavaScript) to dynamically add that to the Students
list (on the left) so they don't need to refresh as well as getting a clean interface. Inserting a new student
into the preview list would look something like:

```js
$.post('/api/', { /*student info*/ }, function(body){
  var Student = JSON.parse(body);
  $('#studentPreviewList').append('<li>'+Student.fullName+'</li>');
});
```

Or other.
