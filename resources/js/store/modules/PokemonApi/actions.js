import axios from 'axios'

export default {
  async loadPokemonData({ dispatch, getters, commit }) {
    const { data } = await axios.get(`${getters.apiUrl}/pokemon`, {
      params: {
        limit: 600,
      }
    })

    const mappedPokemons = data.results.map(pokemon => {
      let [pokemonId] = pokemon.url.match(/\d+\/$/g);
      pokemonId = pokemonId.replace("/", "");

      return {
        id: pokemonId,
        name: pokemon.name,
        image: `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${pokemonId}.png`,
        types: []
      };
    });

    commit("STORE_POKEMONS", mappedPokemons);

    mappedPokemons.forEach(pokemon => {
      dispatch('tryGetPokemonData', pokemon)
    });
  },
  async loadPokemonTypes({ getters, commit }) {
    const { data } = await axios.get(`${getters.apiUrl}/type`);

    const mappedTypes = data.results.map(pokemonType => pokemonType.name)
    commit("STORE_POKEMON_TYPES", mappedTypes);
  },
  async tryGetPokemonData({ dispatch }, pokemon) {
    try {
      await dispatch("getPokemonData", pokemon);
    } catch (e) {
      if (!pokemon.tried) {
        console.info('Tring get pokemon again.', pokemon.id);
        return await dispatch("tryGetPokemonData", { ...pokemon, tried: true });
      }

      console.error("Error loading pokemon data.", pokemon.id);
      throw e
    }
  },
  async getPokemonData({ getters, commit }, { id }) {
    const { data } = await axios.get(`${getters.apiUrl}/pokemon/${id}`);

    const pokemonData = {
      id,
      types: data.types.map(pokemonType => pokemonType.type.name)
    };
    commit("STORE_SPECIFIC_POKEMONS", pokemonData);
  },
  async getPokemonStats({ getters, commit }, id) {
    const { data: pokemonData } = await axios.get(`${getters.apiUrl}/pokemon/${id}`);
    const { data: speciesData } = await axios.get(`${getters.apiUrl}/pokemon-species/${id}`);

    const stats = pokemonData.stats.reduce((amount, statData) => {
      amount[statData.stat.name] = statData.base_stat

      return amount
    }, {})

    const flavorTexts = speciesData.flavor_text_entries
      .filter(({ language }) => language.name === "en")
      .map(flavorText => flavorText.flavor_text);

    const pokemon = {
      id,
      stats,
      flavorTexts,
      name: pokemonData.name,
      types: pokemonData.types.map(pokemonType => pokemonType.type.name),
      image: `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${id}.png`,
    };

    return pokemon
  }
}
