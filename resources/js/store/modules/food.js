import axios from 'axios'
import { GET_FOOD_DATA } from '@/js/store/action.types'
import { SET_FOOD_DATA } from '@/js/store/mutation.types'

/**
 * Whether want to namespace it ot not
 * @type {boolean}
 */
export const namespaced = true

/**
 * State related to Foods
 * @type {Object}
 */
export const state = {
  foods: []
}

/**
 * Actions related to Foods
 * @type {Object}
 */
export const actions = {
  /**
   * Fetch food data from DB
   * @param {object} context
   */
  [GET_FOOD_DATA] ({commit, state}) {
    return new Promise((resolve, reject) => {
      axios.get('/api/foods')
      .then(({data}) => {
        commit(SET_FOOD_DATA, {foods: data})
        resolve()
      })
      .catch((error) => {
        console.log(error)
        reject(error)
      })
    })
  }
}

/**
 * Mutations related to Foods
 * @type {Object}
 */
export const mutations = {
  /**
   * Common mutator for setting up the state
   * @param {object} state
   * @param {object} payload
   */
  [SET_FOOD_DATA] (state, payload) {
    Object.assign(state, payload)
  }
}
