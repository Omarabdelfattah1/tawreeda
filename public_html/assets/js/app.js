function show(shown, hidden) {
  document.getElementById(shown).classList.add("d-block");
  document.getElementById(shown).classList.remove("d-none");
  document.getElementById(hidden).classList.add("d-none");
  document.getElementById(hidden).classList.remove("d-block");
}
