
<script>

function autocompleteMatch(input,search_terms) {
  


  if (input == '') {
    return [];
  }
  var reg = new RegExp(input)
  return search_terms.filter(function(term) {
	  if (term.match(reg)) {
  	  return term;
	  }
  });
}

function showResults(val,type) {
  search_terms="";
  res = "";

  if(type == "clients"){
    search_terms =<?php echo $clients_json;?>;
    res =  document.getElementById("result_client");
  }
  else if(type == "articles"){
    search_terms =<?php echo $articles_json;?>;
    res =  document.getElementById("result_article");

  };


  res.innerHTML = '';
  let list = '';
  let terms = autocompleteMatch(val,search_terms);
  for (i=0; i<terms.length; i++) {
    list += '<li>' + terms[i] + '</li>';
  }
  res.innerHTML = '<ul>' + list + '</ul>';
}
</script>