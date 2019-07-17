import express from "express";
import React from "react";
import { renderToString } from "react-dom/server";
import serialize from "serialize-javascript";
import App from "../../src/App";
import theme from "../../src/theme";
import { ServerStyleSheets, ThemeProvider } from "@material-ui/styles";
const router = express.Router();

router.all("*", (req, res, next) => {
  const sheets = new ServerStyleSheets();
  // Render the component to a string.
  const html = renderToString(
    sheets.collect(
      <ThemeProvider theme={theme}>
        <App req={req} />
      </ThemeProvider>
    )
  );

  // Grab the CSS from our sheets.
  const css = sheets.toString();

  // Send the rendered page back to PHP.
  res.send(`${html}!!, ${css}`);
});

//       const context = { data };
//       const markup = renderToString(
//         <StaticRouter location={req.url} context={context}>
//           <App />
//         </StaticRouter>
//       );

export default router;
