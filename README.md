## Lab Activity 7

Q1
Your form sends data with POST rather than GET. Explain what would go wrong if it used GET instead. Your answer should say something about what a browser does when a page is refreshed.
-> If I used GET, my books details would show in the URL, and refreshing would make the browser send the same request again, so the book could be saved twice. With POST, the data stays out of the URL and the browser warns me before resending it.

Q2
When validation fails, your controller does not run the code that saves the record — and you did not write an if statement to stop it. Explain what actually stops it, and where the visitor ends up.
-> $request->validate() stops it. When I submitted the form empty, a rule failed, so the method stopped there and the saving code never ran, which is why nothing was added to books.json. I ended up back on /books/create with the errors beside the fields and my typed input still there.

Q3
Your success message is displayed from the layout, which renders on every page. Explain why it does not appear on every page.
-> The layout checks for the success message on every page, but ->with('success', ...) keeps it for only one request. After saving, it showed once on /books, and when I clicked another page it was already gone.

