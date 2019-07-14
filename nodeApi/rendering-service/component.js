import express from "express";
import React from "react";
import { renderToString } from "react-dom/server";
import serialize from "serialize-javascript";
import App from "../../src/App";
import theme from '../../src/theme';
import {
  ServerStyleSheets,
  ThemeProvider
} from '@material-ui/styles';
const router = express.Router();

router.post("*", (req, res, next) => {
  const sheets = new ServerStyleSheets();

  // Render the component to a string.
  const html = renderToString(
    sheets.collect(
      <ThemeProvider theme={theme}>
        <App req={req} />
      </ThemeProvider>,
    ),
  );

  // Grab the CSS from our sheets.
  const css = sheets.toString();

  // Send the rendered page back to the client.
  res.send(`${html}!!, ${css}`);
});

// router.get("/", (req, res, next) => {
//   const activeRoute = routes.find(route => matchPath(req.url, route)) || {};

//   const promise = activeRoute.fetchInitialData
//     ? activeRoute.fetchInitialData(req.path)
//     : Promise.resolve("GOOD");

//   promise
//     .then(data => {
//       const context = { data };
//       const markup = renderToString(
//         <StaticRouter location={req.url} context={context}>
//           <App />
//         </StaticRouter>
//       );

//       res.send(`${markup}!!, ${serialize(context)}`);
//     })
//     .catch(next);
// });

export default router;
