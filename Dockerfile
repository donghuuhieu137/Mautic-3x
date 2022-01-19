FROM ubuntu:20.04

COPY . .

RUN apt-get update && \
    apt-get -y install sudo && \
    apt-get -y install nano

RUN pwd

RUN ls

#CMD [ "echo", "hm" ]
CMD /bin/bash
