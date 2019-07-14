import React from "react";
import routes from "./routes";

 import "./App.css";

function App({ req }) {
  if (!req && !window.__INITIAL_DATA__ ) window.__INITIAL_DATA__ = { component: "counntry", data: {Name:"mock country", Region:"mock region"}}
  const { component } = req ? routes.find(({ path }) => req.originalUrl === path) : window.__INITIAL_DATA__;
  const { data } = req ? req.body : window.__INITIAL_DATA__;
  return (
    <div>
      {React.cloneElement(component, data)}
    </div>
  );
}

export default App;
