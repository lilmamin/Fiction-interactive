import { ref } from 'vue';

/**
 * Composable pour effectuer des requêtes fetch et récupérer des données JSON.
 *
 * @param {string} url - L'URL à fetcher.
 * @returns {Object} { data, error, loading, fetchData }
 */
export function useFetchJson(url) {
  const data = ref(null);
  const error = ref(null);
  const loading = ref(false);

  /**
   * Fonction pour lancer la requête fetch.
   */
  async function fetchData() {
    loading.value = true;
    error.value = null;
    data.value = null;
    try {
      const response = await fetch(url, {
        headers: {
          'Accept': 'application/json',
          // Ajoute ici un header d'auth si besoin, exemple: Authorization
        }
      });
      if (!response.ok) {
        throw new Error(`Erreur HTTP ${response.status} : ${response.statusText}`);
      }
      data.value = await response.json();
    } catch (err) {
      error.value = err.message || 'Erreur inconnue';
    } finally {
      loading.value = false;
    }
  }

  // On lance la requête automatiquement à l'initialisation
  fetchData();

  return {
    data,
    error,
    loading,
    fetchData,
  };
}
