console.log("this new part");
 localStorage.setItem("lastname", "Smith");
 localStorage.setItem("name2", "powel");
  localStorage.setItem("name3", "komal");
console.log(localStorage.getItem("name2"));
// array creations
let vagitables=['pototo','tomato','chili'];
localStorage.setItem('vagis',JSON.stringify(vagitables));
console.log(JSON.parse(localStorage.getItem('vagis')));
// clear single items
localStorage.removeItem('name3');

// clear entire localStorage items
// localStorage.clear();

// session start
let name=['harry','jon','worn'];
sessionStorage.setItem('sname',JSON.stringify(name));
 sessionStorage.getItem('sname');
 // console.log(JSON.parse(sessionStorage.getItem('sname')));
 if(sessionStorage.getItem('sname')==null)
 {
 	console.log('empty');
 }else{
 	console.log(sessionStorage.getItem('sname'));
 	// sessionStorage.clear();
 	console.log('this is elsee parts');
 }