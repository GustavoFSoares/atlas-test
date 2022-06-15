export default {
  STORE_POKEMONS(state, pokemons) {
    state.pokemons = pokemons;
  },
  STORE_SPECIFIC_POKEMONS(state, { id, ...pokemonData }) {
    const pokemon = state.pokemons[id - 1];

    if (pokemon.id.toString() !== id.toString()) {
      throw new Error(
        `Pokemon isn't the same. finded: "${pokemon.id}" pokemon: "${id}"`
      );
    }

    pokemon.types = pokemonData.types;
  },
  STORE_POKEMON_TYPES(state, pokemonsTypes) {
    state.types = pokemonsTypes;
  }
};
