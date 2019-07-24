import React from "react";

const routes = [
  {
    path: "/country-item",
    exact: true,
    component: "/country-item"
    // fetchInitialData: () => fetchPopularRepos('all')
  },
  {
    path: "/country-list",
    exact: true,
    component: "/country-list"
    // fetchInitialData: () => fetchPopularRepos('all')
  }
];

export default routes;
