import React from "react";
import Card from "@material-ui/core/Card";
import CardActions from "@material-ui/core/CardActions";
import CardContent from "@material-ui/core/CardContent";
import Button from "@material-ui/core/Button";
import Typography from "@material-ui/core/Typography";
import { Twemoji } from "react-emoji-render";
import ReactCountryFlag from "react-country-flag";
import { renderToString } from "react-dom/server";
import twemoji from "twemoji";
import styled from "styled-components";

// const StyledCard = styled(card)`
//     // minWidth: 275
//   `
const StyledTitle = styled(Typography)`
  font-size: 10px;
`;

const StyledFlag = styled.div`
  .emoji {
    height: 64px !important;
    width: 64px !important;
  }
`;

const CountryItem = props => {
  const { Name, Region, Population, Code2 } = props;
  // console.log(Name, Region, Code2, Population);
  let flagComponent = renderToString(
    <ReactCountryFlag code={Code2.toLowerCase()} />
  );

  return (
    <Card>
      <CardContent>
        <StyledTitle variant="h5" gutterBottom>
          {Name}
        </StyledTitle>
        <Typography variant="h5" component="h4">
          Located in the "<em>{Region}</em>" region
        </Typography>
        <StyledFlag
          dangerouslySetInnerHTML={{
            __html: twemoji.parse(flagComponent, {
              folder: "svg",
              ext: ".svg"
            })
          }}
        />
      </CardContent>
      <CardActions>
        <Button size="small">To cities list</Button>
      </CardActions>
    </Card>
  );
};

export default CountryItem;
