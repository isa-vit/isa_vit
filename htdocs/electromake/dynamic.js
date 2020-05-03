function change(){
num1 = document.getElementById("res").innerHTML;
num2 = document.getElementById("q_res").value;
num3 = num1*num2;

num4 = document.getElementById("cap").innerHTML;
num5 = document.getElementById("q_cap").value;
num6 = num4*num5;

num7 = document.getElementById("ind").innerHTML;
num8 = document.getElementById("q_ind").value;
num9 = num7*num8;

document.getElementById("this").innerHTML = num3+num6+num9;
}