let bordersize;
bordersize = prompt("Select a table border size \n" +
                    "0 (no border) \n" +
                    "1 (1 pixel border) \n" +
                    "4 (4 pixel border) \n" +
                    "8 (8 pixel border) \n");
console.log(bordersize)
switch(bordersize) {
case "0" : document.write("<table>");
    break;
case "1" : document.write("<table border='1'>");
    break;
case "4" : document.write("<table border='4'>");
    break;
case "8" : document.write("<table border='8'>");
    break;
default: document.write("Error - invalid choice: ", bordersize, "<br>")
    break;
}

document.write("<caption> 2008 NFL Divisional"," Winners </caption>");

document.write("<tr>",
               "<th/>",
               "<th>American Conference</th>",
               "<th>National Conference</th>",
               "<tr>",
               "<th> East </th>",
               "<td> Miani Dolphins </td>",
               "<td>New York Giants </td>",
               "</tr>",
               "<tr>",
               "<th>North</th>",
               "<td>Pittsburgh Steelers</td>",
               "<td>Minnersota Vikings</td>",
               "</tr>",
               "<tr>",
               "<th>West</th>",
               "<td>San Diego Chargers</td>",
               "<td>Arizona Cardinals</td>",
               "</tr>",
               "<tr>",
               "<th>South</th>",
               "<td>Tennessee Titans</td>",
               "<td>Carolina Panthers</td>",
               "</tr>",
               "</table>",
              );
