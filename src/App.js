import React from "react";
import routes from "./routes";
import CountryList from "./components/CountryList";
import "./App.css";
import Switch from "./components";
import CountryItem from "./components/CountryItem";
// import CountryItem from "./CountryItem";

function App({ req }) {
  // console.log(req.body);
  if (!req && !window.__INITIAL_DATA__) {
    window.__INITIAL_DATA__ = {
      component: "counntry",
      data: { Name: "mock country", Region: "mock region" }
    };
  }
  const component = req ? req.originalUrl : window.__INITIAL_DATA__.component;
  const { data } = req ? req.body : window.__INITIAL_DATA__;
  return (
    <>
      <Switch reqRoute={component} reqProps={data}>
        <CountryItem route="/country-item" />
        <CountryList route="/country-list" />
      </Switch>
    </>
  );
}

export default App;
