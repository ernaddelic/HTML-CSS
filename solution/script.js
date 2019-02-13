var scoreOfJonh ="45";
var scoreOfNick ="85";
var pass="51";
if (scoreOfJonh >= pass && scoreOfNick >= pass){
    console.log("Both students passed");
    
}
else if (scoreOfJonh >= pass || scoreOfNick >= pass)
{
 console.log("One of the students passed");
    if(scoreOfJonh > scoreOfNick){
        console.log("And it's John with " + scoreOfJonh + " points" );
    }
    else {
        console.log("And it's Nick with " + scoreOfNick + " points");
    }
}
else {
    console.log("Both of the students failed");
}