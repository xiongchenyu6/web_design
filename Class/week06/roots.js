const a = prompt("what is the value of 'a'? \n","");
const b = prompt("what is the value of 'b'? \n","");
const c = prompt("what is the value of 'c'? \n","");
const root_part = Math.sqrt(b*b - 4.0 * a * c);
const denom = 2.0 * a;
const root1 = (-b + root_part) /denom;
const root2 = (-b - root_part) /denom;
document.write("The first root is: ", root1, "<br>")
document.write("The second root is: ", root2, "<br>")
