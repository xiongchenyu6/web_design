const median = (list) => {
    list.sort((a, b)=> a-b)
    const list_len = list.length;

    if((list_len % 2 === 1))
        return list[Math.floor(list_len/2)];
    else
        return Math.round((list[list_len/2 - 1] + list[list_len / 2])/2);
}

const my_list_1 = [8, 3, 9, 1, 4, 7];
const my_list_2 = [10, -2 , 0 , 5, 3, 1, 7];

let med = median(my_list_1);
document.write("Median of [", my_list_1, "] is :", med , "<br>")

med = median(my_list_2);
document.write("Median of [", my_list_2, "] is :", med , "<br>")
