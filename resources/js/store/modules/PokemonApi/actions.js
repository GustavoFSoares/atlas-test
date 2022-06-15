import axios from 'axios'

export default {
  async loadPokemonData({ dispatch, getters, commit }) {
    const { data } = await axios.get(`${getters.apiUrl}/pokemon`, {
      params: {
        limit: 548,
      }
    })

    const mappedPokemons = data.results.map(pokemon => {
      let [pokemonId] = pokemon.url.match(/\d+\/$/g)
      pokemonId = pokemonId.replace('/', '')

      return {
        id: pokemonId,
        name: pokemon.name,
        image: `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${pokemonId}.png`,
        types: []
      };
    });

    commit("STORE_POKEMONS", mappedPokemons);

    mappedPokemons.forEach(pokemon => {
      dispatch('getPokemonData', pokemon)
    });

  },
  async getPokemonData({ getters, commit }, { id }) {
    const { data } = await axios.get(`${getters.apiUrl}/pokemon/${id}`);

    const pokemonData = {
      id: data.id,
      types: data.types.map(pokemonType => pokemonType.type.name)
    };
    commit("STORE_SPECIFIC_POKEMONS", pokemonData);
  }
}
