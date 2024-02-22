let j1Pokemon = document.querySelector("#pokemonJ1");
let j2Pokemon = document.querySelector("#pokemonJ2");

j1Pokemon.addEventListener("change", () => {

  let str = j1Pokemon.value;
  console.log(str);
  finalResult = "https" +  str.split("https").pop();
 

  document.querySelector("#pokemonSelect1").setAttribute("src",finalResult );
});




j2Pokemon.addEventListener("change", () => {

  let str2 = j2Pokemon.value;
  finalResult2 = "https" +  str2.split("https").pop();
  console.log(finalResult2);

  document.querySelector("#pokemonSelect2").setAttribute("src",finalResult2 );
});
