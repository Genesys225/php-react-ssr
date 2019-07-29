import React from "react";
import CountryList from "./components/CountryList";
import "./App.css";
import Switch from "./components";
import CountryItem from "./components/CountryItem";

function App(props) {
  // console.log(req.body);
  if (!props.component && !window.__INITIAL_DATA__) {
    window.__INITIAL_DATA__ = {
      component: "counntry",
      data: { Name: "mock country", Region: "mock region" }
    };
  }
  const { component } = props.component ? props : window.__INITIAL_DATA__;
  const { data } = props.data ? props : window.__INITIAL_DATA__;
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
