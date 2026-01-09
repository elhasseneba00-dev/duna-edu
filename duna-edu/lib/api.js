const API_URL =
  process.env.NEXT_PUBLIC_API_URL || "http://dunaedu-master.test/api";

async function request(endpoint, { lang = "fr", method = "GET", body } = {}) {
  try {
    const url = `${API_URL}${endpoint}${endpoint.includes("?") ? "&" : "?"}lang=${lang}`;

    const options = {
      method,
      headers: {
        ...(body ? { "Content-Type": "application/json" } : {}),
      },
      ...(body ? { body: JSON.stringify(body) } : {}),
    };

    const res = await fetch(url, options);
    const json = await res.json().catch(() => {
      throw new Error("Réponse API invalide (JSON)");
    });

    if (!res.ok || json?.success === false) {
      const message = json?.message || `Erreur API (${res.status})`;
      throw new Error(message);
    }

    return json.data ?? null;
  } catch (error) {
    console.error("API error:", error);
    throw error;
  }
}

// Wrapper générique pour compatibilité éventuelle
export async function fetchAPI(endpoint, lang = "fr", options = {}) {
  return request(endpoint, { lang, ...options });
}

// --- Helpers spécifiques pour le site ---

export const getSite = (lang = "fr") => request("/v1/site", { lang });

export const getAbout = (lang = "fr") => request("/v1/about", { lang });

export const getCourses = (params = {}, lang = "fr") => {
  const search = new URLSearchParams(params).toString();
  const endpoint = `/v1/courses${search ? `?${search}` : ""}`;
  return request(endpoint, { lang });
};

export const getCourseBySlug = (slug, lang = "fr") =>
  request(`/v1/courses/${slug}`, { lang });

// --- Formulaires ---

export const postNewsletter = (email, lang = "fr") =>
  request("/v1/forms/newsletter", {
    lang,
    method: "POST",
    body: { email },
  });

export const postContact = (payload, lang = "fr") =>
  request("/v1/forms/contact", {
    lang,
    method: "POST",
    body: payload,
  });

export const postDevis = (payload, lang = "fr") =>
  request("/v1/forms/devis", {
    lang,
    method: "POST",
    body: payload,
  });

export const postCandidature = (payload, lang = "fr") =>
  request("/v1/forms/candidature", {
    lang,
    method: "POST",
    body: payload,
  });
