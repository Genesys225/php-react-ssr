import express from "express";
import React from "react";
import { renderToString } from "react-dom/server";
import { ServerStyleSheet } from "styled-components";

import App from "../../src/App";
import theme from "../../src/theme";
import { ServerStyleSheets, ThemeProvider } from "@material-ui/styles";
const router = express.Router();

router.post("*", (req, res, next) => {
  const sheets = new ServerStyleSheets();
  const style = new ServerStyleSheet();
  console.log(req.params);
  const component = req.originalUrl;
  const { data } = req.body;
  // Render the component to a string.

  const html = renderToString(
    style.collectStyles(
      sheets.collect(
        <ThemeProvider theme={theme}>
          <App data={data} component={component} />
        </ThemeProvider>
      )
    )
  );
  const styleTags = style.getStyleTags();

  const css = sheets.toString();
  res.send(`${html}!!, ${css}!!, ${styleTags}`);

  // Grab the CSS from our sheets.

  // Send the rendered page back to PHP.
});

//       const context = { data };
//       const markup = renderToString(
//         <StaticRouter location={req.url} context={context}>
//           <App />
//         </StaticRouter>
//       );

export default router;
