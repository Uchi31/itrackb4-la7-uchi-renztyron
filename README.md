## Lab Activity 7

Q1. Why does the form use POST instead of GET?

The form uses POST because it is sending data to the server to create a new record. If GET was used, the data would appear in the URL and refreshing the page could repeat the request. POST is better for submitting information because the data is sent in the request body.

Q2. What stops the save when validation fails?

The $request->validate() method checks the submitted data before the save code runs. If a rule fails, Laravel automatically stops the controller method and redirects the visitor back to the form with the validation errors. This is why the record is not saved when the input is invalid.

Q3. Why does the success message not appear on every page?

The layout is displayed on every page, but the success message only exists in the session after a successful save. The message is read from the session and then removed after it is displayed. Because of this, it appears once and does not continue showing on other pages.