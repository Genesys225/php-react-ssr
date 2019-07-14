import React from "react";
import CountryItem from "./CountryItem";

const routes = [

  {
    path: "/country",
    exact: true,
    component: < CountryItem / >
      // fetchInitialData: () => fetchPopularRepos('all')
  }
];

export default routes;