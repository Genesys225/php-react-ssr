import React from "react";
import Country from "./CountryItem";

const routes = [

  {
    path: "/country",
    exact: true,
    component: <Country/>
      // fetchInitialData: () => fetchPopularRepos('all')
  }
];

export default routes;